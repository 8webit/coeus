import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Title } from '@angular/platform-browser';

import { SharedModule } from '../../shared/shared.module';
import {HomeAlfaComponent} from './home-alfa.component';

@NgModule({
  imports: [
    CommonModule,
    SharedModule
  ],
  providers: [
    Title
  ],
  declarations: [ HomeAlfaComponent ],
  exports: [HomeAlfaComponent ]
})
export class HomeAlfaModule { }
