import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {RouterModule} from '@angular/router';

import {ErrorRoutingModule} from './error-routing.module';

import {ErrorComponent} from './error.component';


@NgModule({
    imports: [ RouterModule, CommonModule, ErrorRoutingModule],
    declarations: [ErrorComponent],
    exports: [ ErrorComponent ],
    providers: [],
})
export class ErrorModule {}
