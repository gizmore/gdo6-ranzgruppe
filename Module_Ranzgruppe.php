<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
use GDO\UI\GDT_Headline;
use GDO\UI\GDT_Page;

/**
 * Ranzgruppe! The biggest punk band in the obversable universe.
 * This is a demo site for gdo6.
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
    
    public function isSiteModule() { return true; }
    
    public function getDependencies()
    {
        return ['Account', 'Admin', 'Audio', 'Avatar', 'Backup', 'Captcha', 'Classic', 'Comment', 'Contact',
            'Favicon', 'FontTitillium', 'Gallery', 'Guestbook', 'Invite', 'JQueryAutocomplete', 'Login', 'Memberlist',
            'News', 'Perf', 'Profile', 'Recovery', 'Register', 'User', 'Vote',
        ];
    }
    
    public function getTheme() { return 'ranzgruppe'; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/ranzgruppe'); }
    
    #############
    ### Hooks ###
    #############
    public function onInitSidebar()
    {
        # Top
        $nav = GDT_Page::$INSTANCE->topNav;
        $nav->addFields(array(
            GDT_Headline::withHTML(GDT_Link::make('link_home')->href(href('Ranzgruppe', 'Home'))->renderCell())->level(1)
        ));
        
        # Left
        $nav = GDT_Page::$INSTANCE->leftNav;
        if (GDO_User::current()->isGhost())
        {
            $nav->addField(GDT_Link::make('link_join')->href(href('Register', 'Form')));
        }
    }

}
