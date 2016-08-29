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
  private isUpdate: boolean = false;

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

  // Note: As of RC.4, Angular forms version 0.2.0, we can't update
  // the whole model, we update fields one by one 
    this.itemsService.itemLoaded().subscribe((item: Item) => {
             console.log('Item loaded: ');
             console.log(item);
             this.isVisible = true;
             this.id.updateValue(item.id);
             this.name.updateValue(item.name);
             this.description.updateValue(item.description);
             this.status.updateValue(item.status);
             this.isUpdate = true;
         });
  }

  public save () {
    console.log('Saving form');
    console.log(this.name);
    var item = new Item(this.id.value, this.name.value, this.description.value, this.status.value);
    
    if (this.isUpdate) {

          this.itemsService.updateItem(item).subscribe(
                      item => this.item = item,
                      error => this.errorMessage = <any>error,
                      () => console.log('Working update now'));
    } else {
      this.itemsService.saveItem(item).subscribe(
                      item => this.item = item,
                      error => this.errorMessage = <any>error,
                      () => console.log('Working save new now'));
    }
  }

  public toggleForm () {
    this.isVisible = !this.isVisible;
    this.isUpdate = false;
    console.log('Set to... ' + this.isVisible);
  }



  public loadForm (id: number) {
    console.log('Loading form for number ' + id);
  }
}
