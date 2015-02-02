<?php

/**
 * Model
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Model extends BaseModel
{
    public static function getByBrand($brandId = false) {

        $q = Doctrine_Core::getTable("Model")
            ->createQuery('M')
            ->innerJoin('M.Brand B')
            ->orderBy('M.name ASC');

        if ($brandId) {
            $q->where('B.id = ?', $brandId);
        }

        return $q->execute()->toArray();
    }


    /////////////////////////////////////////////////////////
    
    public function getFotoDefecto($id) {
    }

    public function obtenerPrecio($model){ //obtiene el precio por hora a partir del modelo del auto

		$q = Doctrine_Query::create()
                ->select('price')
                ->from('Calculator')
				->where('modelo LIKE ?', $model)
		        ->groupBy('modelo');

        $messeges = $q->fetchOne();

        //calcula el precio arrendando el vehículo los fines de semana del mes
        //$result = ceil($messeges->getPrice() * pow( ( 1 / (1 + 0.05) ), date('Y') - $year) );
		if ($messeges){
			return ceil($messeges->getPrice());
		}else{
			return 5000;
		};
	}
    public function obtenerPrecioPorAnio($precio, $anio){
        $interes = 0.03;
        $n=2012-intval($anio);
        $precio = $precio/pow((1+$interes),$n);
        
        return round($precio);
    }


}
