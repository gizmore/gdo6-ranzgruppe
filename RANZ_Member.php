<?php
namespace GDO\Ranzgruppe;

use GDO\Core\GDO;
use GDO\Profile\GDT_User;
use GDO\Audio\GDT_Instrument;
use GDO\User\GDO_User;
use GDO\DB\GDT_UInt;

/**
 * A member of Ranzgruppe.
 * @author gizmore
 */
final class RANZ_Member extends GDO
{
    ###########
    ### GDO ###
    ###########
    public function gdoColumns()
    {
        return array(
            GDT_User::make('ranz_id')->primary(),
            GDT_Instrument::make('ranz_instrument')->notNull(),
            GDT_UInt::make('ranz_gigs')->bytes(2)->notNull()->initial("0"),
        );
    }
    
    ##############
    ### Getter ###
    ##############
    /**
     * @return GDO_User
     */
    public function getUser() { return $this->getValue('ranz_id'); }
    public function getUserId() { return $this->getVar('ranz_id'); }
    
    
}
