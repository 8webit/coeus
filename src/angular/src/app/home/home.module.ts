import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedModule } from '../shared/shared.module';
import {HomeAlfaModule} from './home-alfa/home-alfa.module';
import { RouterModule } from '@angular/router';

import { HomeComponent } from './home.component';
import { HomeBetaComponent } from './home-beta/home-beta.component';

@NgModule({
  imports: [
    RouterModule,
    SharedModule,
    CommonModule,
    HomeAlfaModule
  ],
  declarations: [HomeComponent, HomeBetaComponent],
  exports: [HomeComponent]
})
export class HomeModule { }
