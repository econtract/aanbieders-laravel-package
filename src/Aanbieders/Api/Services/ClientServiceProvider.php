<?php namespace Aanbieders\Api\Services;


class ClientServiceProvider extends BaseServiceProvider {

    public function __construct($baseUrl = null)
    {
        parent::__construct($baseUrl);

        $this->defaults = array(
            'gender'            => 0,
            'segment'           => 0,
            'first_name'        => '',
            'last_name'         => '',
            'birthdate'         => date('Y-m-d'),
            'birthplace'        => '',
            'nationality'       => '',
            'idnr'              => '',
            'rrnr'              => '',
            'cellphone'         => '',
            'landline'          => '',
            'email'             => '',
            'language'          => 'nl',
            'company'           => '',
            'vat'               => '',
            'user_id'           => 0,
            'client_id'         => 0,
            'bban'              => '',
            'iban'              => '',
            'bic'               => ''
        );

        $this->guards = array(
            'user_id',
            'client_id'
        );
    }


    public function getClient($id)
    {
        return $this->getCurlService()->get( $this->crmBaseUrl. '/clients/'. $id );
    }

    public function searchClient($query)
    {
        return $this->getCurlService()->post( $this->crmBaseUrl. '/clients/search', array( 'query' => $query ) );
    }

    public function createClient($attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl. '/clients', $this->addDefaultAttributes( $attributes ) );
    }

    public function updateClient($id, $attributes = array())
    {
        return $this->getCurlService()->post( $this->crmBaseUrl. '/clients/'. $id, $this->filterImmutableAttributes( $attributes ) );
    }

}