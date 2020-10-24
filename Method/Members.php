<?php
namespace GDO\Ranzgruppe\Method;

use GDO\Table\MethodQueryCards;
use GDO\User\GDO_User;

final class Members extends MethodQueryCards
{
    public function gdoTable()
    {
        return GDO_User::table();
    }
    
}
