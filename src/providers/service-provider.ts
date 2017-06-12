import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import 'rxjs/add/operator/map';


/*
  Generated class for the ServiceProvider provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class ServiceProvider {

	api:string = 'http://localhost/appmarket-api/'	

  constructor(public http: Http) {
  }

	  getData()
	  {
	  	return this.http.get(this.api+'listado.php').map(res=>res.json())
	  }

	  dataRegister(parans)
	  {
	  		let headers = new Headers ({'Content-Type':'application/x-www-form-urlencoded'});
	  		return this.http.post(this.api + "insert.php",parans,
							  	{
							  		headers: headers,
							  		method:"POST"
							  	}).map(
							  		(res:Response)=> {return res.json();}	
							  	);
	  }

}
