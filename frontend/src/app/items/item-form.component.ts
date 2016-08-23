import { Component } from '@angular/core';
import { Item }    from './item';
@Component({
  selector: 'my-items-form',
  templateUrl: './item-form.component.html'
})
export class ItemFormComponent {
  status = ['Really Smart', 'Super Flexible',
            'Super Hot', 'Weather Changer'];
  model: Item;
  submitted = false;
  onSubmit() { this.submitted = true; }
  // Reset the form with a new hero AND restore 'pristine' class state
  // by toggling 'active' flag which causes the form
  // to be removed/re-added in a tick via NgIf
  // TODO: Workaround until NgForm has a reset method (#6822)
  active = true;
  newHero() {
    //this.model = new Hero(42, '', '');
    this.active = false;
    setTimeout(() => this.active = true, 0);
  }
}
