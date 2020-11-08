<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;

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
    
    public function isSiteModule() { return true; }
    
    public function getDependencies()
    {
        return ['Account', 'Admin', 'Audio', 'Avatar', 'Backup', 'Captcha', 'Classic', 'Comment', 'Contact',
            'FontTitillium', 'Gallery', 'Guestbook', 'Invite', 'JQueryAutocomplete', 'Login', 'Memberlist',
            'News', 'Perf', 'Profile', 'Recovery', 'Register', 'User', 'Vote',
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
            GDT_Link::make('link_home')->href(href('Ranzgruppe', 'Home'))->css('font-size', '28px'),
        ));
    }
    
    public function hookLeftBar(GDT_Bar $nav)
    {
        if (GDO_User::current()->isGhost())
        {
            $nav->addField(GDT_Link::make('link_join')->href(href('Register', 'Form')));
        }
        $nav->addFields(array(
//             GDT_Link::make('link_members')->href(href('Memberlist', 'View')),
//             GDT_Link::make('link_gigs')->href(href('Ranzgruppe', 'Gigs')),
//             GDT_Link::make('link_albums')->href(href('Audio', 'AlbumList')),
        ));
    }

}
