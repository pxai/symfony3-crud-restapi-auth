import { Http, Response } from '@angular/http';
import {Headers} from '@angular/http';
import {Observable} from "rxjs/Rx";

import 'rxjs/add/operator/map';
import { Injectable } from '@angular/core';
import {Item} from './item';
/**
* http gets injected through the constructor argument
* don't forget to tell the injector in any component we use
* using the providers..
*/
@Injectable()
export class ItemsService {
  public title: string = 'Angular 2';
  private http: Http;
  private items: Item[] = [{id: 1, name: 'epa', description: 'epa1'}, {id: 2, name:'epa2', description: 'epa2'}];
  private itemsUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item';
  private itemUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item/detail';

  constructor (http: Http) {
    this.http = http;
  }

  // Could be : Observable <User[]>  to get intellisense
  public  getItems(): Observable <Item[]>  {
    // we subscribe to an observable, when data is ready
    // we push data to the component. this will be a consumer

    // We expose only data using map operator, that must be imported
     // return this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item")
      // .map(result => result.json());

  /*public getTasks() {
      return Promise.resolve(this.tasks);
  }*/
      // With a promise
    // HAU IZAN BEAHRKO
   //return Promise.resolve(this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item").map(result => result.json()));
   //return Promise.resolve(this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item"));

    // With static data works..
    // return Promise.resolve(this.items);

      //.map(result => result.json());
      // then instead of subscribe use then();
        //return this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item")
       //.map(result => result.json());
    return this.http.get(this.itemsUrl)
                    .map(res => res.json())
                    .catch(this.handleError);
  }

/**
* gets just one item
*/
public getItem(id: number): Observable<Item> {
  return this.http.get(this.itemUrl + '/' + id)
                  .map(res => res.json())
                  .catch(this.handleError);
}

// As seen on angular.io, but not working
  private extractData(res: Response) {
    let body = res.json();
    return body.data || { };
  }

  private handleError (error: any) {
    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message
    let errMsg = (error.message) ? error.message :
      error.status ? `${error.status} - ${error.statusText}` : 'Server error';
    console.error(errMsg); // log to console instead
    return Observable.throw(errMsg);
  }

 /* public save(item: Item) {
    //JSON.stringify("{id:5,username:'epa',email:'nunse'}"
    let headers = new Headers();
    headers.append('Content-type','application/json');
    return this.http.post('http://localhost:3000/api/user/save', JSON.stringify(item), {headers: headers})
        .map(result => result.json());
  }

  public update(item) {
    this.http.put('http://localhost:3000/api/user/update', JSON.stringify(item))
        .map(result => result.json());
  }

  public delete(id) {
    this.http.put('http://localhost:3000/api/user/delete/', '');
  }
*/
}
