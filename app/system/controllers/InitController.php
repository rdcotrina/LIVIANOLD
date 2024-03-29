<?php

namespace System\Controllers;

use \Vendor\Controller;

class InitController extends \System\Models\InitModel {

    use Controller {
        Controller::__construct as private __cConstruct;
    }

    public function __construct() {
        parent::__construct();  /* se ejecuta el constructor del MODEL */
        $this->__cConstruct();  /* se ejecuta el constructor del CONTROLLER */
//        $this->import(['system' => 'Login']);
    }

    public function index() {

        if (Obj()->Vendor->Session->get('sys_isLogin')) {
            Obj()->Vendor->View->render('index', false);
        } else {
            Obj()->Vendor->View->render('login', false);
        }
    }

    public function titleBar() {
        Obj()->Vendor->View->render();
    }

    public function dataTree() {
        $d = '[
    {
        "value": "item1",
        "text": "Panels",
        "isChecked": false,
        "isSelected": false,
        "imageOpen": "_open",
        "imageClosed": "_closed",
        "nodes": [
            {
                "value": "notesLink",
                "text": "Development Notes",
                "isChecked": true,
                "isSelected": true,
                "image": "_doc",
                "registered": "Demo.devNotesPanel"
            },
            {
                "value": "xhrLink",
                "text": "Ventana",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.ventana"
            },
            {
                "value": "xhrLink",
                "text": "XHR: Lorem Ipsum",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.xhrPanel"
            },
            {
                "value": "youtube4Link",
                "text": "Iframe: YouTube",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.youtubePanel"
            },
            {
                "value": "splitPanelLink",
                "text": "Split Panel",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.splitPanelPanel"
            },
            {
                "value": "panelControls",
                "text": "Controls",
                "isChecked": false,
                "isSelected": false,
                "imageOpen": "_open",
                "imageClosed": "_closed",
                "nodes": [
                    {
                        "value": "paccordiontestLink",
                        "text": "Accordion",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.accordionBuilder"
                    },
                    {
                        "value": "plistLink",
                        "text": "Basic List",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.listBuilder"
                    },
                    {
                        "value": "pcalendarLink",
                        "text": "Calendar",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.calendarBuilder"
                    },
                    {
                        "value": "pcbgLink",
                        "text": "Check Box Grid",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.checkBoxGrid"
                    },
                    {
                        "value": "pibLink",
                        "text": "Image Button",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.imageButtonBuilder"
                    },
                    {
                        "value": "pogLink",
                        "text": "Grid",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.gridBuilder"
                    },
                    {
                        "value": "pslLink",
                        "text": "Select List",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.selectListBuilder"
                    },
                    {
                        "value": "pstpLink",
                        "text": "Stepper",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.stepperBuilder"
                    },
                    {
                        "value": "ptaLink",
                        "text": "Text Area",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.textAreaBuilder"
                    },
                    {
                        "value": "ptbLink",
                        "text": "Text Box",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.textBoxBuilder"
                    },
                    {
                        "value": "ptreeLink",
                        "text": "Tree",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.treeBuilder"
                    }
                ]
            }
        ]
    },
    {
        "value": "item2",
        "text": "Windows",
        "isChecked": true,
        "isSelected": false,
        "imageOpen": "_open",
        "imageClosed": "_closed",
        "nodes": [
            {
                "value": "ajaxpageLink",
                "text": "Ajax/XHR Demo",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.ajaxpageWindow"
            },
            {
                "value": "jsonLink",
                "text": "Json Demo",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.jsonWindows"
            },
            {
                "value": "youtubeLink",
                "text": "Iframe",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.youtubeWindow"
            },
            {
                "value": "splitWindowLink",
                "text": "Split Window",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.splitWindow"
            },
            {
                "value": "modalLink",
                "text": "Modal Window",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Demo.createModal"
            },
            {
                "value": "panelControls",
                "text": "Controls",
                "isChecked": false,
                "isSelected": false,
                "imageOpen": "_open",
                "imageClosed": "_closed",
                "nodes": [
                    {
                        "value": "waccordiontestLink",
                        "text": "Accordion",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.accordionBuilder"
                    },
                    {
                        "value": "wlistLink",
                        "text": "Basic List",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.listBuilder"
                    },
                    {
                        "value": "wcalendarLink",
                        "text": "Calendar",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.calendarBuilder"
                    },
                    {
                        "value": "wcbgLink",
                        "text": "Check Box Grid",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.checkBoxGrid"
                    },
                    {
                        "value": "wibLink",
                        "text": "Image Button",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.imageButtonBuilder"
                    },
                    {
                        "value": "wogLink",
                        "text": "Grid",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.gridBuilder"
                    },
                    {
                        "value": "wslLink",
                        "text": "Select List",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.selectListBuilder"
                    },
                    {
                        "value": "wstpLink",
                        "text": "Stepper",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.stepperBuilder"
                    },
                    {
                        "value": "wtaLink",
                        "text": "Text Area",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.textAreaBuilder"
                    },
                    {
                        "value": "wtbLink",
                        "text": "Text Box",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.textBoxBuilder"
                    },
                    {
                        "value": "wtreeLink",
                        "text": "Tree",
                        "isChecked": false,
                        "isSelected": false,
                        "image": "_doc",
                        "registered": "Demo.treeBuilder"
                    }
                ]
            }
        ]
    },
    {
        "value": "item3",
        "text": "Plugins",
        "isChecked": false,
        "isSelected": false,
        "imageOpen": "_open",
        "imageClosed": "_closed",
        "nodes": [
            {
                "value": "clockLink",
                "text": "Clock",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "CoolClock.createWindow"
            },
            {
                "value": "parametricsLink",
                "text": "Window Parametrics",
                "isChecked": false,
                "isSelected": false,
                "image": "_doc",
                "registered": "Parametrics.createwindow"
            }
        ]
    }
]';
        echo json_encode($d);
    }

    public function ajaxForm() {
        Obj()->Vendor->View->render();
    }
    
    public function lipSum() {
        Obj()->Vendor->View->render();
    }
    
    public function toolBarSearch() {
        Obj()->Vendor->View->render();
    }
    
    public function blank() {
        echo '';
    }
    
    public function overView() {
        echo '<p>MochaUI is a web applications user interface library built on the Mootools JavaScript framework.</p>

        <h3>Uses</h3>
        <ul>
                <li>Web Applications</li>
                <li>Web Desktops</li>
                <li>Web Sites</li>
                <li>Widgets</li>
                <li>Standalone Dialog Windows, Modals, and Wizards</li>
        </ul>';
    }
    
    public function download() {
        echo '<p>Includes all the required assets plus examples.</p>
<p><a target="_blank" href="http://github.com/downloads/mui/mochaui/">Download MochaUI version 0.9.8</a></p>';
    }
    
    public function tips() {
        echo '<ul>
	<li>Ctrl-Alt-Q toggles window visibility.</li>
	<li>F11 toggles full screen mode.</li>
</ul>';
    }
    
    public function notes() {
        Obj()->Vendor->View->render();
    }
    
}
