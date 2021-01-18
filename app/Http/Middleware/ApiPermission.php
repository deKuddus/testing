<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class ApiPermission
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
            $url=this_url();
        	if(!in_array($url,freeLinks())){
    
        		$proceed=true;
                
    	    	if(!$request->user()->role){
    	    		$proceed=false;
    	    	}
    
    	    	$links=explode('/',$url);

    	    	if(isset($links[1])){
    	    		if(!checkPermission(getModule($links[1]) ? getModule($links[1])->id : '',$request->user()->role->permissions,'modules')){
    	    			$proceed=false;
    	    		}
    	    	}
    
    	    	if(isset($links[2])){
    	    		if(!checkPermission(getMenu($links[2]) ? getMenu($links[2])->id : '',$request->user()->role->permissions,'menu') && !checkPermission(getSubmenu($links[2]) ? getSubmenu($links[2])->id : '',$request->user()->role->permissions,'submenu')){
    	    			$proceed=false;
    	    		}
    	    	}
    
    	    	if(!$proceed){
                    
                    return response()->json([
                        'error' => 404,
                        'message' => 'Whoops! You do not have the permission to access the page.'
                    ]); 
    	    	}
    	    }
        }

    	return $next($request);
    }
}
