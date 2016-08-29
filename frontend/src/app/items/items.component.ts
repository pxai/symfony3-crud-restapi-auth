import { Component, OnInit } from '@angular/core';
import { ItemsService } from './items.service';
import { Item } from './item';
import { ItemFormComponent } from './item-form.component';
import { ItemRowComponent } from './item-row.component';

@Component({
  selector: 'my-items',
  providers: [ItemsService],
  directives: [ItemFormComponent, ItemRowComponent],
  templateUrl: './items.component.html',
  styleUrls: ['./items.component.scss']
})
export class ItemsComponent implements OnInit {
  public title: string = 'Items';
  private message: string = 'Items message';
  private _ItemsService: ItemsService;
  public errorMessage: string;
  public items: Item[] = [];
  private item: Item;

  constructor(ItemsService: ItemsService) {
   this._ItemsService = ItemsService;
       this._ItemsService.itemDeleted.subscribe(
         item => {
          console.log('Item has been deleted: ' + item.id);
       });
  }

  public ngOnInit() {
        this.getItems();
        // this.getItem(2);
        console.log('Hello Items: ' + this.message + ': ' + this.items.length);
  }

  private getItems () {
       this._ItemsService.getItems().subscribe(
                       items => this.items = items,
                       error => this.errorMessage = <any>error,
                       () => console.log('Working now'));
  }


  private getItem (id: number) {
       this._ItemsService.getItem(id).subscribe(
                       item => this.item = item,
                       error => this.errorMessage = <any>error,
                       () => console.log('Working now, one item'));
  }

  private loadItem (item: Item) {
       this._ItemsService.loadItem(item);
  }
  


}
