import { Component, OnInit } from '@angular/core';
import { ItemsService } from './items.service';
import { Item } from './item';

@Component({
  selector: 'my-artean-items',
  providers: [ItemsService],
  templateUrl: './items.component.html',
  styleUrls: ['./items.component.scss']
})
export class ItemsComponent implements OnInit {
  private title: String = 'Items';
  private message: String = 'Items message';
  private _ItemsService: ItemsService;
  private errorMessage: String
  public items: Item[] = [];
  
  constructor(ItemsService: ItemsService) {
   this._ItemsService = ItemsService;
  }
 
  public ngOnInit() {
        this.getItems();    
        console.log('Hello Items: ' + this.message + ': ' + this.items.length);
  }

  private getItems () {
       this._ItemsService.getItems().subscribe(
                       items => this.items = items,
                       error =>  this.errorMessage = <any>error);
  }

}
