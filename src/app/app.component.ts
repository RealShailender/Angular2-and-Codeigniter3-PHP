import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

import { User } from './user.model';
import { LoginService } from './login.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [LoginService]
})
export class AppComponent implements OnInit {
  title = 'app works!';
  username: string = "";
  password: string = "";

  constructor(public router: Router, public _loginService: LoginService, ) { }

  ngOnInit() {
  }

  login() {
    let user = new User('', '');
    user.username = this.username;
    user.password = this.password;
    let data = [
      { 'username': user.username, 'password': user.password }
    ];
    this._loginService.sendLogin({ data })
      .subscribe(
      response => this.handleResponse(response),
      error => this.handleResponse(error)
      );
  }

  handleResponse(response) {
    if (response.success) {
      console.log("success");
    } else if (response.error) {
      console.log("errror");
    } else {

    }

  }
}
