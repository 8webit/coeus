import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TemplatePlainComponent } from './template-plain.component';

describe('TemplatePlainComponent', () => {
  let component: TemplatePlainComponent;
  let fixture: ComponentFixture<TemplatePlainComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TemplatePlainComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TemplatePlainComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
