<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Nht\Http\Requests;

use Nht\Http\Controllers\Admin\AdminController;

use Nht\Hocs\ProductVideos\ProductVideoRepository;

use \Google_Client;
use \Google_Exception;
use \Google_Service_Exception;
use \Google_Service_YouTube;

use Nht\Events\CreateVideoEvent;
use Nht\Events\DeleteVideoEvent;

use Nht\Listeners\PutVideoToEs;
use Event;

class VideoController extends AdminController
{
    public function __construct(ProductVideoRepository $video)
    {
        parent::__construct();
        $this->video = $video;
    }

    public function getIndex(Request $request)
    {
        $videos = $this->video->getVideos(20, $request->all());
        return view('admin/videos/index', compact('videos'));
    }

    public function postCreate(Request $request)
    {
        $data = (array) $request->get('data');
        $updated = 0;
        foreach($data as $item) {
            if(!$this->video->isExist($item['video_id'])) {
                $item['created_at'] = date('Y-m-d H:i:s');
                $item['updated_at'] = date('Y-m-d H:i:s');
                if($video = $this->video->create($item)) {
                    Event::fire(new CreateVideoEvent($video));
                    $updated ++;
                }
            }
        }

        if($updated > 0) {
            return response()->json([
                'code' => 1,
                'updated' => $updated,
                'message' => 'Cập nhật thành công'
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'message' => 'Những video này đã có trong hệ thống'
            ]);
        }
    }

    public function getFindFormYoutube(Request $request)
    {
        $videos = [];
        return view('admin/videos/find_form', compact('videos'));
    }

    public function findFromYoutube(Request $request)
    {
        $keyword = $request->get('keyword');

        $DEVELOPER_KEY = 'AIzaSyDgw7JoSOV_VqSLZBWP40kHd8la0tRP8EU';

        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        $dataInsert = [];

        try {
            // Call the search.list method to retrieve results matching the specified
            // query term.
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q'          => $keyword,
                'maxResults' => $request->get('maxResults'),
                'type'       => 'video',
                'regionCode' => 'VN',
                'order'       => $request->get('order')
            ));

            // Add each result to the appropriate list, and then display the lists of
            // matching videos, channels, and playlists.
            foreach ($searchResponse['items'] as $key => $searchResult) {
                switch ($searchResult['id']['kind']) {
                    case 'youtube#video':
                        $dataInsert[] = [
                            'product_id' => 0,
                            'video_id' => $searchResult['id']['videoId'],
                            'title' => $searchResult['snippet']['title'],
                            'teaser' => $searchResult['snippet']['description'],
                            'channel_id' => $searchResult['snippet']['channelId'],
                            'channel_name' => $searchResult['snippet']['channelTitle'],
                            'created_at' => date('y-m-d H:i:s'),
                            'updated_at' => date('y-m-d H:i:s')
                        ];

                    break;
                }
            }

            $videos = $dataInsert;

            return view('admin/videos/find_form', compact('videos'));

        } catch (Google_Service_Exception $e) {
          _debug($e->getMessage());
        } catch (Google_Exception $e) {
            _debug($e->getMessage());
        }
    }


    public function getDelete(Request $request, $id)
    {
        $video = $this->video->getById($id);
        if($this->video->delete($id)) {
            Event::fire(new DeleteVideoEvent($video));
            return redirect()->back()->with('success', 'Xóa thành công video ' . $video->getTitle());
        }

        return redirect()->back()->with('error', 'Xóa không thành công');
    }


    public function tagIndex($videoId)
    {
        $video = $this->video->getById($videoId);
        $tags = $video->tags()->get();

        return view('admin/product_videos/tag/index', compact('video', 'tags'));
    }


    public function tagCreate($videoId)
    {
        $video = $this->video->getById($videoId);
        return view('admin/product_videos/tag/create', compact('video'));
    }


    public function tagCreateStore($videoId, Request $request)
    {
        $video = $this->video->getById($videoId);
        $tags = explode(',', $request->get('tags'));
        $video->tags()->attach($tags);
        return redirect()->back()->with('success', 'Thêm tag thành công');
    }


    public function tagDelete($videoId, $tagId)
    {
        \DB::table('videos_tags')->where('video_id', $videoId)->where('tag_id', $tagId)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}