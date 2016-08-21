import { Component } from '@angular/core';
import { ROUTER_DIRECTIVES } from '@angular/router';

import { ApiService } from './shared';

import '../style/app.scss';

/*
 * App Component
 * Top Level Component
 */
@Component({
  selector: 'my-app', // <my-app></my-app>
  providers: [ApiService],
  directives: [...ROUTER_DIRECTIVES],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  public title: String = 'Angular 2';
  url = 'https://artean.cuatrovientos.org';

  constructor(private api: ApiService) {
  }
}
