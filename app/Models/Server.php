<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * @param array $data
     * @return bool
     */
    public function addServer(array $data) {
        if($data['id']) {
            $affectedRows = $this->where('id', $data['id'])->update($data);
            return $affectedRows ? true : false;
        }
        $server = $this->create($data);
        return $server->id ? true : false;
    }

    /**
     * @return mixed
     */
    public function selServer() {
        $servers = $this->where('is_del',1)->paginate(2);
        $pageHtml = $servers->links() ? $servers->links()->toHtml() : '';
        $servers = $servers->toArray();
        $servers['pageHtml'] = $pageHtml;
        return $servers;
    }
}
