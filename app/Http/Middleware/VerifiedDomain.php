<?php

namespace App\Http\Middleware;

use Closure;
use App\Domain;//this is just a model where I associate domains with sites
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VerifiedDomain {

    protected $Domain;

    public function handle($request, Closure $next){

        $domain = $_SERVER['SERVER_NAME'];
        $Domain = Domain::where('domain', $domain)->first();
                
        if(!$Domain){ throw new NotFoundHttpException; }

        $Site = $Domain->site;

        if(!$Site){
            throw new NotFoundHttpException;
        }

        $this->Domain = $Domain;

        return $next($request);
    }

    public function getDomain(){
        return $this->Domain;
    }

    public function getSite(){
        return $this->Domain->site;
    }

}