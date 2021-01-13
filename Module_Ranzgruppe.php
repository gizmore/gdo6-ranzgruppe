<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_DIV;

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
    
    public function getClasses()
    {
        return [
            RANZ_Member::class,
        ];
    }
    
    public function getTheme() { return 'ranzgruppe'; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/ranzgruppe'); }
    
    ##############
    ### Assets ###
    ##############
    public function onIncludeScripts()
    {
        $this->addCSS('css/ranzgruppe.css');
    }
    
    #############
    ### Hooks ###
    #############
    public function onInitSidebar()
    {
        # Top
        $tnav = GDT_Page::$INSTANCE->topNav;
        $tnav->addFields(array(
            GDT_Link::make('link_home')->href(href('Ranzgruppe', 'Home')),
        ));
        
        # Left
        $lnav = GDT_Page::$INSTANCE->leftNav;
        $lnav->addFieldFirst(GDT_DIV::make()->addClass("greek-siderbar-ornament"));
        if (GDO_User::current()->isGhost())
        {
            $lnav->addField(GDT_Link::make('link_join')->href(href('Register', 'Form')));
        }
        
        # Right
        $rnav = GDT_Page::$INSTANCE->rightNav;
        $rnav->addFieldFirst(GDT_DIV::make()->addClass("greek-siderbar-ornament"));
    }

}
