import {
  async,
  inject,
  addProviders
} from '@angular/core/testing';

import { TestComponentBuilder } from '@angular/compiler/testing';
import { ItemsComponent } from './items.component';
import { ItemsService } from './items.service';


describe('Items Component', () => {
  beforeEach(() => {
    addProviders([]);
  });

  it('should ...', async(inject([TestComponentBuilder], (tcb: TestComponentBuilder) => {
    tcb.createAsync(ItemsComponent).then((fixture) => {
      fixture.detectChanges();
    });
  })));

});


describe('Items Service', () => {
  beforeEach(() => {
    addProviders([ItemsService]);
  });

  it('should ...', inject([ItemsService], (api: ItemsService) => {
    expect(api.title).toBe('Items Service');
  }));
});

