import {Component, Input} from '@angular/core';
@Component({
  selector: '[item-row]',
  templateUrl: 'item-row.component.html'
})
export class ItemRowComponent {
  @Input('item-row') item;
}