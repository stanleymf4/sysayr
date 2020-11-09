<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gsbmenu extends Model
{
    protected $table = 'gsbmenu';
    protected $primaryKey = 'gsbmenu_id';
    protected $fillable = ['gsbmenu_name', 'gsbmenu_url', 'gsbmenu_icon'];
    protected $guarded = 'gsbmenu_id';

    public function roles()
    {
        return $this->belongsToMany(Gtvrole::class, 'gsbmerl', 'gsbmerl_menu_id', 'gsbmerl_role_id');
    }

    public function getSons($parents, $line)
    {
        $sons = [];
        foreach ($parents as $line1) {
            if ($line['gsbmenu_id'] == $line1['gsbmenu_parent_id']) {
                $sons = array_merge($sons, [array_merge($line1, ['submenu' => $this->getSons($parents, $line1)])]);
            }
        }
        return $sons;
    }

    public function getParents($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('gsbmerl_role_id', session()->get('rol_id'))->orderby('gsbmerl_menu_id');
            })->orderby('gsbmenu_parent_id')
                ->orderby('gsbmenu_order')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('gsbmenu_parent_id')
                ->orderby('gsbmenu_order')
                ->get()
                ->toArray();
        }
    }

    public static function getMenu($front = false)
    {
        $menu = new Gsbmenu();
        $parents = $menu->getParents($front);
        $menuAll = [];
        foreach ($parents as $line) {
            if ($line['gsbmenu_parent_id'] != 0)
                break;
            $item = [array_merge($line, ['submenu' => $menu->getSons($parents, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }

    public function storeOrder($menu)
    {
        $menus = json_decode($menu);
        var_dump($menus);
        foreach ($menus as $var => $value) {
            $this->where('gsbmenu_id', $value->id)->update(['gsbmenu_parent_id' => 0, 'gsbmenu_order' => $var + 1]);
            if (!empty($value->children)) {
                foreach ($value->children as $key => $vchild) {
                    $update_id = $vchild->id;
                    $parent_id = $value->id;
                    $this->where('gsbmenu_id', $update_id)->update(['gsbmenu_parent_id' => $parent_id, 'gsbmenu_order' => $key + 1]);

                    if (!empty($vchild->children)) {
                        foreach ($vchild->children as $key => $vchild1) {
                            $update_id = $vchild1->id;
                            $parent_id = $vchild->id;
                            $this->where('gsbmenu_id', $update_id)->update(['gsbmenu_parent_id' => $parent_id, 'gsbmenu_order' => $key + 1]);

                            if (!empty($vchild->children)) {
                                foreach ($vchild1->children as $key => $vchild2) {
                                    $update_id = $vchild2->id;
                                    $parent_id = $vchild1->id;
                                    $this->where('gsbmenu_id', $update_id)->update(['gsbmenu_parent_id' => $parent_id, 'gsbmenu_order' => $key + 1]);

                                    if (!empty($vchild2->children)) {
                                        foreach ($vchild2->children as $key => $vchild3) {
                                            $update_id = $vchild3->id;
                                            $parent_id = $vchild2->id;
                                            $this->where('gsbmenu_id', $update_id)->update(['gsbmenu_parent_id' => $parent_id, 'gsbmenu_order' => $key + 1]);

                                            if (!empty($vchild3->children)) {
                                                foreach ($vchild3->children as $key => $vchild4) {
                                                    $update_id = $vchild4->id;
                                                    $parent_id = $vchild2->id;
                                                    $this->where('gsbmenu_id', $update_id)->update(['gsbmenu_parent_id' => $parent_id, 'gsbmenu_order' => $key + 1]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
