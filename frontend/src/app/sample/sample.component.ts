import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'my-sample',
  templateUrl: './sample.component.html',
  styleUrls: ['./sample.component.scss']
})
export class SampleComponent implements OnInit {
  private message: String = 'Sample message';
  constructor() {
    // Do stuff
  }

  ngOnInit() {
    console.log('Hello Sample: ' + this.message);
  }

}
