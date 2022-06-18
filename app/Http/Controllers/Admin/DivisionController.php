<?php

namespace App\Http\Controllers\Admin;

// use App\Models\Division;
use App\Http\Controllers\Admin\Panel\PanelController;
use App\Http\Requests\Admin\DivisionRequest as StoreRequest;
use App\Http\Requests\Admin\DivisionRequest as UpdateRequest;

class DivisionController extends PanelController
{
    public function setup()
	{
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\Division');
		$this->xPanel->setRoute(admin_uri('divisions'));
		$this->xPanel->setEntityNameStrings(trans('admin.division'), trans('admin.divisions'));
		
		$this->xPanel->addButtonFromModelFunction('top', 'bulk_deletion_btn', 'bulkDeletionBtn', 'end');
		$this->xPanel->addButtonFromModelFunction('line', 'cities', 'citiesBtn', 'beginning');
		$this->xPanel->addButtonFromModelFunction('line', 'admin_divisions1', 'adminDivisions1Btn', 'beginning');
		
		// Filters
		// -----------------------
		$this->xPanel->disableSearchBar();
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'name',
			'type'  => 'text',
			'label' => mb_ucfirst(trans('admin.Name')),
		],
			false,
			function ($value) {
				if (preg_match('|^[A-Z]{2}$|', $value)) {
					$this->xPanel->addClause('where', 'code', '=', "$value");
				} else {
					$this->xPanel->addClause('where', 'name', 'LIKE', "%$value%");
				}
			});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'country_id',
			'type'  => 'select2',
			'label' => mb_ucfirst(trans('admin.Name')) . ' (' . trans('admin.select') . ')',
		],
			getCountries(true),
			function ($value) {
				$this->xPanel->addClause('where', 'code', '=', $value);
			});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'status',
			'type'  => 'dropdown',
			'label' => trans('admin.Status'),
		], [
			1 => trans('admin.Activated'),
			2 => trans('admin.Unactivated'),
		], function ($value) {
			if ($value == 1) {
				$this->xPanel->addClause('where', 'active', '=', 1);
			}
			if ($value == 2) {
				$this->xPanel->addClause('where', function ($query) {
					$query->where(function ($query) {
						$query->columnIsEmpty('active');
					});
				});
			}
		});
		
		/*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/
		// COLUMNS
		$this->xPanel->addColumn([
			'name'      => 'id',
			'label'     => '',
			'type'      => 'checkbox',
			'orderable' => false,
		]);
		$this->xPanel->addColumn([
			'name'          => 'name',
			'label'         => trans('admin.Name'),
			'type'          => 'model_function',
			'function_name' => 'getNameHtml',
		]);
		$this->xPanel->addColumn([
			'name'          => 'active',
			'label'         => trans('admin.Active'),
			'type'          => 'model_function',
			'function_name' => 'getActiveHtml',
		]);
		$this->xPanel->addField([
			'name'              => 'name',
			'label'             => trans('admin.Name'),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => trans('admin.enter_division_name'),
			],
			'wrapperAttributes' => [
				'class' => 'col-md-6',
			],
		]);
	}
	
	public function store(StoreRequest $request)
	{
		
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		
		return parent::updateCrud();
	}
}
