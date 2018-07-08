import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { SharedModule } from '../../shared/shared.module';
import { PagingModule } from '../../paging/paging.module';

import {TemplateSearchComponent} from './template-search.component';
import {TemplateSearchRoutingModule} from './template-search-routing.module';

@NgModule({
    imports: [
        TemplateSearchRoutingModule,
        PagingModule,
        RouterModule,
        SharedModule,
        CommonModule
    ],
    exports : [TemplateSearchComponent],
    declarations: [TemplateSearchComponent]
})


export class TemplateSearchModule {}
