<?php namespace Daos;
use Models\Object as M_Object;
use Daos\Connection as Connection;
     /**
      *
      */
     class ExampleDAO
     {
          private $connection;
          function __construct() {}
          /**
           *
           */
          public function create($_object) {
			$sql = "INSERT INTO /*table*/ (/*campos a insertar*/) VALUES (/*valores, ej:  :name,:surname*/)";
               //$parameters['name'] = $_object->getName();
               try {
                    // creo la instancia connection
     			$this->connection = Connection::getInstance();
				// Ejecuto la sentencia.
				return $this->connection->ExecuteNonQuery($sql, $parameters);
			} catch(\PDOException $ex) {
                   throw $ex;
              }
          }
          /**
           *
           */
          public function read($_value) {
               $sql = "SELECT * FROM /*table*/ where /*value*/ = /*:value*/";
               $parameters['value'] = $_value;
               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql, $parameters);
               } catch(Exception $ex) {
                   throw $ex;
               }
               if(!empty($resultSet))
                    return $this->mapear($resultSet);
               else
                    return false;
          }
          /**
           *
           */
          public function readAll() {
               $sql = "SELECT * FROM /*table*/";
               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
               } catch(Exception $ex) {
                   throw $ex;
               }
               if(!empty($resultSet))
                    return $this->mapear($resultSet);
               else
                    return false;
          }
          /**
           *
           */
          public function edit($_object) {
               $sql = "UPDATE /*table*/ SET /*value_to_edit*/ = /*:value, value_to_edit = :value2, etc...*/";
               //$parameters['value'] = $_object->getName();
               try {
                    // creo la instancia connection
     			$this->connection = Connection::getInstance();
				// Ejecuto la sentencia.
				return $this->connection->ExecuteNonQuery($sql, $parameters);
			} catch(\PDOException $ex) {
                   throw $ex;
              }
          }
          /**
           *
           */
          public function update($value) {
          }
          /**
           *
           */
          public function delete($key) {
               /*$sql = "DELETE FROM table WHERE value = :value";
               
               try {
                    $this->connection = Connection::getInstance();
				// Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
				$sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(":value", $key);
                    $sentencia->execute();
               } catch(PDOException $Exception) {
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			}*/
          }
          /**
		* Transforma el listado en
		* objetos de la clase
		*
		* @param  Array $Listado a transformar a objeto.
		*/
		protected function mapear($value) {
			$value = is_array($value) ? $value : [];
			$resp = array_map(function($p){
				return null;//<-- new Object($p['key']);
			}, $value);
               return count($resp) > 1 ? $resp : $resp['0'];
		}
     }