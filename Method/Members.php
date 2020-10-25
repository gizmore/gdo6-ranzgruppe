<?php
namespace GDO\Ranzgruppe\Method;

use GDO\Table\MethodQueryCards;
use GDO\Ranzgruppe\RANZ_Member;

final class Members extends MethodQueryCards
{
    public function gdoTable()
    {
        return RANZ_Member::table();
    }
    
}
