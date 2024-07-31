<?php
namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class LteSideBar extends Widget {
    public $menuItems = [];

    public function run()
    {
        return $this->renderMenu($this->menuItems);
    }

    protected function renderMenu($items)
    {
        $html = '<nav class="mt-2">';
        $html .= '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
        $html .= $this->renderItems($items);
        $html .= '</ul>';
        $html .= '</nav>';

        return $html;
    }

    protected function renderItems($items)
    {
        $html = '';
        foreach ($items as $item) {
            // var_dump('<pre>',$item);
            // die;
            $active = !empty($item['active']) ? ' active' : '';
            $openMenu = !empty($item['active']) ? ' menu-is-opening menu-open' : '';
            $html .= '<li class="nav-item '.$openMenu.'">';
            if (isset($item['items'])) {
                $html .= Html::a(
                    !empty($item['icon']) ? '<i class="'. $item['icon'] .' nav-icon"></i> <p>' . $item['label'] . '<i class="right fas fa-angle-left"></i></p>': '<i class="far fa-circle nav-icon"></i> <p>' . $item['label'] . '<i class="right fas fa-angle-left"></i></p>',
                    isset($item['url']) ? Url::to($item['url']) : '#',
                    ['class' => 'nav-link '. $active]
                );
            } else {
                $html .= Html::a(
                    !empty($item['icon']) ? '<i class="'. $item['icon'] .' nav-icon"></i> <p>' . $item['label'] . '</p>': '<i class="far fa-circle nav-icon"></i>' . '<p>' . $item['label'] . '</p>',
                    isset($item['url']) ? Url::to($item['url']) : '#',
                    ['class' => 'nav-link '. $active]
                );
            }

            if (isset($item['items'])) {
                $html .= '<ul class="nav nav-treeview">';
                $html .= $this->renderItems($item['items']);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }
}

