import {Component, Input} from '@angular/core';
import { ItemsService } from './items.service';
import { ItemFormComponent } from './item-form.component';
import { Item } from './item';

@Component({
  selector: '[item-row]',
  directives: [ItemFormComponent],
  templateUrl: 'item-row.component.html'
})
export class ItemRowComponent {
  @Input('item-row') item;
  private _ItemsService: ItemsService;

  constructor(ItemsService: ItemsService) {
   this._ItemsService = ItemsService;
  }

  private deleteItem (item: Item) {
      this._ItemsService.deleteItem(item.id).subscribe((res) => {
          this._ItemsService.itemDeletedSource.next(item);
      });
  }

   private detailItem (item: Item) {
       this._ItemsService.loadItem(item);
  }

  private updateItem (item: Item) {
       this._ItemsService.itemLoadUpdateSource.next(item);
  }

}