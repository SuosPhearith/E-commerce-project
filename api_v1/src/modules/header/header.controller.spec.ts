import { Test, TestingModule } from '@nestjs/testing';
import { HeaderController } from './header.controller';
import { HeaderService } from './header.service';

describe('HeaderController', () => {
  let controller: HeaderController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [HeaderController],
      providers: [HeaderService],
    }).compile();

    controller = module.get<HeaderController>(HeaderController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
