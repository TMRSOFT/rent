<?php
/** @package    RENT::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Auto.php");

/**
 * AutoController is the controller class for the Auto object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package RENT::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AutoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Auto objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Auto records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AutoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Placa,Modelo,Fkmarca,FktipoAuto,Ano,Motor,Color,NroPuertas,Capacidad,PrecioPorDia,TipoCombustible,CapacidadCombustible,TipoCaja,Estado,Foto,Fkempresa'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$autos = $this->Phreezer->Query('Auto',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $autos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $autos->TotalResults;
				$output->totalPages = $autos->TotalPages;
				$output->pageSize = $autos->PageSize;
				$output->currentPage = $autos->CurrentPage;
			}
			else
			{
				// return all results
				$autos = $this->Phreezer->Query('Auto',$criteria);
				$output->rows = $autos->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Auto record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('placa');
			$auto = $this->Phreezer->Get('Auto',$pk);
			$this->RenderJSON($auto, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Auto record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$auto = new Auto($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$auto->Placa = $this->SafeGetVal($json, 'placa');
			$auto->Modelo = $this->SafeGetVal($json, 'modelo');
			$auto->Fkmarca = $this->SafeGetVal($json, 'fkmarca');
			$auto->FktipoAuto = $this->SafeGetVal($json, 'fktipoAuto');
			$auto->Ano = $this->SafeGetVal($json, 'ano');
			$auto->Motor = $this->SafeGetVal($json, 'motor');
			$auto->Color = $this->SafeGetVal($json, 'color');
			$auto->NroPuertas = $this->SafeGetVal($json, 'nroPuertas');
			$auto->Capacidad = $this->SafeGetVal($json, 'capacidad');
			$auto->PrecioPorDia = $this->SafeGetVal($json, 'precioPorDia');
			$auto->TipoCombustible = $this->SafeGetVal($json, 'tipoCombustible');
			$auto->CapacidadCombustible = $this->SafeGetVal($json, 'capacidadCombustible');
			$auto->TipoCaja = $this->SafeGetVal($json, 'tipoCaja');
			$auto->Estado = $this->SafeGetVal($json, 'estado');
			$auto->Foto = $this->SafeGetVal($json, 'foto');
			$auto->Fkempresa = $this->SafeGetVal($json, 'fkempresa');

			$auto->Validate();
			$errors = $auto->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$auto->Save(true);
				$this->RenderJSON($auto, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Auto record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('placa');
			$auto = $this->Phreezer->Get('Auto',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $auto->Placa = $this->SafeGetVal($json, 'placa', $auto->Placa);

			$auto->Modelo = $this->SafeGetVal($json, 'modelo', $auto->Modelo);
			$auto->Fkmarca = $this->SafeGetVal($json, 'fkmarca', $auto->Fkmarca);
			$auto->FktipoAuto = $this->SafeGetVal($json, 'fktipoAuto', $auto->FktipoAuto);
			$auto->Ano = $this->SafeGetVal($json, 'ano', $auto->Ano);
			$auto->Motor = $this->SafeGetVal($json, 'motor', $auto->Motor);
			$auto->Color = $this->SafeGetVal($json, 'color', $auto->Color);
			$auto->NroPuertas = $this->SafeGetVal($json, 'nroPuertas', $auto->NroPuertas);
			$auto->Capacidad = $this->SafeGetVal($json, 'capacidad', $auto->Capacidad);
			$auto->PrecioPorDia = $this->SafeGetVal($json, 'precioPorDia', $auto->PrecioPorDia);
			$auto->TipoCombustible = $this->SafeGetVal($json, 'tipoCombustible', $auto->TipoCombustible);
			$auto->CapacidadCombustible = $this->SafeGetVal($json, 'capacidadCombustible', $auto->CapacidadCombustible);
			$auto->TipoCaja = $this->SafeGetVal($json, 'tipoCaja', $auto->TipoCaja);
			$auto->Estado = $this->SafeGetVal($json, 'estado', $auto->Estado);
			$auto->Foto = $this->SafeGetVal($json, 'foto', $auto->Foto);
			$auto->Fkempresa = $this->SafeGetVal($json, 'fkempresa', $auto->Fkempresa);

			$auto->Validate();
			$errors = $auto->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$auto->Save();
				$this->RenderJSON($auto, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Auto record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('placa');
			$auto = $this->Phreezer->Get('Auto',$pk);

			$auto->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
