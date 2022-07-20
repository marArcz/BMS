<?php
 class Permit{
    private $resID;
    private $bname;
    private $btype;
    private $baddress;
    private $OrNumber;
    private $amount;
    function __construct($id, $name, $type, $add, $or, $amount)
    {
        $this->resID = $id;
        $this->bname = $name;
        $this->btype = $type;
        $this->baddress = $add;
        $this->OrNumber = $or;
        $this->amount = $amount;
    }


    /**
     * Get the value of resID
     */
    public function getResID()
    {
            return $this->resID;
    }

    /**
     * Get the value of bname
     */
    public function getBname()
    {
            return $this->bname;
    }

    /**
     * Get the value of btype
     */
    public function getBtype()
    {
            return $this->btype;
    }

    /**
     * Get the value of baddress
     */
    public function getBaddress()
    {
            return $this->baddress;
    }

    /**
     * Get the value of OrNumber
     */
    public function getOrNumber()
    {
            return $this->OrNumber;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
            return $this->amount;
    }
}


include "DB.php";
function addPermit(Permit $permit)
{
    global $mysqli;
    $query = prep_stmt("INSERT INTO permit values(null, ?,?,?,?,?,?)");
    $query->bind_param(
        "isssss",
        $permit->getResID(),
        $permit->getBname(),
        $permit->getBaddress(),
        $permit->getBtype(),
        $permit->getOrNumber(),
        $permit->getAmount()
    );
    $query->execute() or die("Cannot add permit: " . $mysqli->error);
    return true;
}

class PermitModel
{
    public static function add(Permit $permit)
    {
        $db = new DB();
        $query = $db->prep_stmt("INSERT INTO permit values(null, ?,?,?,?,?,?)");
        $id = $permit->getResID();
        $bname = $permit->getBname();
        $baddress = $permit->getBaddress();
        $type =  $permit->getBtype();
        $number = $permit->getOrNumber();
        $amount = $permit->getAmount();
        $query->bind_param(
            "isssss",
            $id,$bname,$baddress,$type,$number,$amount
        );
        $query->execute() or die("Cannot add permit: " . $db->getError());
        return true;
    }
    public static function update(Permit $permit, $id)
    {
        $db = new DB();
        if(!$query = $db->prep_stmt("UPDATE permit SET residentID=?,businessName=?,businessAddress=?,type=?,orNumber=?,amount=? WHERE id=?"))
        {
            return false;
        }
        $resId = $permit->getResID();
        $bname = $permit->getBname();
        $baddress = $permit->getBaddress();
        $type =  $permit->getBtype();
        $number = $permit->getOrNumber();
        $amount = $permit->getAmount();
        $query->bind_param(
            "isssssi",
            $resId,$bname,$baddress,$type,$number,$amount,$id
        );
        if(!$query->execute()){
            return false;
        }
        return true;
    }
    public static function get($id)
    {
        $db = new DB();
        $query = $db->prep_stmt("SELECT *, permit.id AS pID, residents.id AS resID FROM permit INNER JOIN residents on permit.residentID = residents.id WHERE residents.ID = ?");
        $query->bind_param(
            "i",
            $id
        );
        $query->execute() or die("Cannot get permit: " . $db->getError());
        return $res = $query->get_result()->fetch_assoc();
    }
}
