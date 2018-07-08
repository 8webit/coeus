import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule} from '@angular/router';

import {AuthorRoutingModule} from './author-routing.module';
import {AuthorComponent} from './author.component';
import {SharedModule} from '../shared/shared.module';

@NgModule({
    imports: [
        SharedModule,
        AuthorRoutingModule,
        RouterModule,
        CommonModule ],
    declarations: [
        AuthorComponent
    ],
    exports: [ AuthorComponent ],
})
export class AuthorModule { }
