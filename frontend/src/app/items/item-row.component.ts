import {Component, Input} from '@angular/core';
import { ItemsService } from './items.service';
import { Item } from './item';

@Component({
  selector: '[item-row]',
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

}