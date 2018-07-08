import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeAlfaComponent } from './home-alfa.component';

describe('HomeAlfaComponent', () => {
  let component: HomeAlfaComponent;
  let fixture: ComponentFixture<HomeAlfaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeAlfaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeAlfaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
