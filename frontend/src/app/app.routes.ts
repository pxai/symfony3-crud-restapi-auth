import { provideRouter, RouterConfig } from '@angular/router';

import { HomeComponent } from './home';
import { AboutComponent } from './about';
import { SampleComponent } from './sample';
import { ItemsComponent } from './items';

export const routes: RouterConfig = [
  { path: '', component: HomeComponent },
  { path: 'about', component: AboutComponent},
  { path: 'sample', component: SampleComponent},
  { path: 'items', component: ItemsComponent}
];

export const APP_ROUTER_PROVIDERS = [
  provideRouter(routes)
];
