import {Injectable}               from '@angular/core';
import { Http,Headers, URLSearchParams}  from '@angular/http';
import { Observable }     from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

@Injectable()
export class LoginService {
 constructor(public _http: Http) { }
 private _contactUrl = 'http://localhost/angular/a2php/mvcphp/login';
  sendLogin(value:any){
   
    const body = new URLSearchParams(value);
    body.set('username', value.data[0].username);
    body.set('password', value.data[0].password);
    let headers = new Headers();
    headers.append('Content-Type', 'application/x-www-form-urlencoded');
    return this._http.post(this._contactUrl, body, {
      headers: headers
    }).map( res => res.json() );
   
  }
}