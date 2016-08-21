import {
  async,
  inject,
  addProviders
} from '@angular/core/testing';

import { TestComponentBuilder } from '@angular/compiler/testing';

import { SampleComponent } from './sample.component';

describe('Sample Component', () => {
  beforeEach(() => {
    addProviders([]);
  });

  it('should ...', async(inject([TestComponentBuilder], (tcb: TestComponentBuilder) => {
    tcb.createAsync(SampleComponent).then((fixture) => {
      fixture.detectChanges();
    });
  })));

});
