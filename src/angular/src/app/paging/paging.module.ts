import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { PagingComponent } from './paging.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule
  ],
  declarations: [PagingComponent],
  exports: [PagingComponent]
})
export class PagingModule { }
