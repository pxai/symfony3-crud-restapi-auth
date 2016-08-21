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
  public title: string = 'Items';
  private message: string = 'Items message';
  private _ItemsService: ItemsService;
  public errorMessage: string;
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
                       error => this.errorMessage = <any>error,
                       () => console.log('Working now'));
  }

}
