<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

use cebe\openapi\Reader;

class OpenApiTest extends TestCase
{
    public function test_swagger_yaml_is_available()
    {
        $this
            ->get('/api/docs/swagger.yaml')
            ->assertOk();
    }

    public function test_swagger_ui_is_available()
    {
        $this
            ->get('/api/docs/')
            ->assertOk();
    }

    public function test_openapi_schema_is_valid()
    {
        $res = $this->get('/api/docs/swagger.yaml');
        $openapi = Reader::readFromYamlFile($res->getFile()->getRealPath());
        $this->assertTrue($openapi->validate(), 'Invalid shcema');
    }
}
