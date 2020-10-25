<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

/**
 * Ranzgruppe! The biggest punk world in the obversable universe.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_Ranzgruppe extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public $module_priority = 100;
    
    public $module_license = "Properitary";
    
    public function getDependencies()
    {
        return ['Classic', 'Audio', 'Account', 'Admin', 'Login', 'Register', 'Vote', 'Comment',
            'JQueryAutocomplete', 'Profile', 'Guestbook', 'Contact', 'Gallery',
        ];
    }
    
    public function getThemes() { return ['ranzgruppe']; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/ranzgruppe'); }
    
    #############
    ### Hooks ###
    #############
    public function hookTopBar(GDT_Bar $nav)
    {
        $nav->addFields(array(
            GDT_Link::make('link_home')->href(href('Ranzgruppe', 'Home'))->css('font-size', '34px'),
        ));
    }
    
    public function hookLeftBar(GDT_Bar $nav)
    {
        $nav->addFields(array(
            GDT_Link::make('link_members')->href(href('Ranzgruppe', 'Members')),
            GDT_Link::make('link_join')->href(href('Ranzgruppe', 'Join')),
            GDT_Link::make('link_gigs')->href(href('Ranzgruppe', 'Gigs')),
            GDT_Link::make('link_albums')->href(href('Ranzgruppe', 'Albums')),
        ));
    }

}
