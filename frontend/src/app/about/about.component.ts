import { Component, OnInit } from '@angular/core';
import { FooterComponent } from './footer.component';


@Component({
  selector: 'my-about',
  templateUrl: './about.component.html',
  directives: [FooterComponent],
  styleUrls: ['./about.component.scss']
})
export class AboutComponent implements OnInit {

  constructor() {
    // Do stuff
  }

  ngOnInit() {
    console.log('Hello About');
  }

}
