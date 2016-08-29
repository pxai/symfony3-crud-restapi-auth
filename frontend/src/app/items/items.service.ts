import { Http, Response, RequestOptions } from '@angular/http';
import {Headers} from '@angular/http';
//import {Observable} from 'rxjs/Rx';
import {Subject} from 'rxjs/Subject';
import {Observable} from 'rxjs/Observable';

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
  private item: Item;
  private subject: Subject<Item> = new Subject<Item>();

//  private items: Item[] = [{id: 1, name: 'epa', description: 'epa1'}, {id: 2, name:'epa2', description: 'epa2'}];
  private itemsUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item';
  private itemUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item/detail';
  private itemSaveUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item/create';
  private itemUpdateUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item/update';
  private itemDeleteUrl: string = 'http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item/delete/';

  constructor (http: Http) {
    this.http = http;
  }

  public loadItem(item: Item): void {
     console.log('Loading item... ' + item);
     this.item = item;
     this.subject.next(item);
  }

   public itemLoaded(): Observable<Item> {
     console.log('Item changed...');
     return this.subject.asObservable();
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
   // return Promise.resolve(this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item")
   // .map(result => result.json()));
   // return Promise.resolve(this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item"));

    // With static data works..
    // return Promise.resolve(this.items);

      // .map(result => result.json());
      // then instead of subscribe use then();
        // return this.http.get("http://localhost/symfony3-crud-restapi-auth/web/app_dev.php/admin/api/item")
       // .map(result => result.json());
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
  /*private extractData(res: Response) {
    let body = res.json();
    return body.data || { };
  }*/

  private handleError (error: any) {
    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message
    let errMsg = (error.message) ? error.message :
      error.status ? `${error.status} - ${error.statusText}` : 'Server error';
    console.error(errMsg); // log to console instead
    return Observable.throw(errMsg);
  }

 public saveItem(item: Item): Observable<Item> {
    console.log('Saving item: ' + item);
    let itemForSymfony = {};
    itemForSymfony['item'] = item;
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    return this.http.post(this.itemSaveUrl, JSON.stringify(itemForSymfony), options)
        .map(result => result.json());
  }

 public updateItem(item: Item): Observable<Item> {
    console.log('Updating item: ' + item);
    let itemForSymfony = {};
    itemForSymfony['item'] = item;
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    return this.http.put(this.itemUpdateUrl, JSON.stringify(itemForSymfony), options)
        .map(result => result.json());
  }
/*
  public update(item) {
    this.http.put('http://localhost:3000/api/user/update', JSON.stringify(item))
        .map(result => result.json());
  }


*/

  public deleteItem(id) {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    return this.http.delete(this.itemDeleteUrl + id, options);
  }
}
