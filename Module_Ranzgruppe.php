<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

final class Module_Ranzgruppe extends GDO_Module
{
    public function getDependencies() { return ['Classic', 'Audio']; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/ranzgruppe'); }
    
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
