import { Component } from '@angular/core';
import {
  REACTIVE_FORM_DIRECTIVES,
  FormGroup,
  FormBuilder,
  FormControl
} from '@angular/forms';
import { ItemsService } from './items.service';

import { Item } from './item';

@Component({
  selector: 'my-items-form',
  templateUrl: './item-form.component.html',
  directives: [REACTIVE_FORM_DIRECTIVES]
})
export class ItemFormComponent {

  model = {'id': 0, 'name': '', 'description': ''};
  isVisible: boolean = false;
  private itemForm: FormGroup;
  private id: FormControl;
  private name: FormControl;
  private description: FormControl;
  private status: FormControl;
  private item: Item;
  private errorMessage: string;

  constructor (private itemsService: ItemsService, builder: FormBuilder) {
    this.id = new FormControl('', []);
    this.name = new FormControl('', []);
    this.description = new FormControl('', []);
    this.status = new FormControl('', []);
    this.itemForm = builder.group({
      id: this.id,
      name: this.name,
      description: this.description,
      status: this.status
    });
  }

  public save () {
    console.log('Saving form');
    console.log(this.name);
    var item = new Item(null, 'Try', 'And it Works', 5);
    this.itemsService.saveItem(item).subscribe(
                    item => this.item = item,
                    error => this.errorMessage = <any>error,
                    () => console.log('Working now'));
  }

  public toggleForm () {
    this.isVisible = !this.isVisible;
    console.log('Set to... ' + this.isVisible);
  }
}
