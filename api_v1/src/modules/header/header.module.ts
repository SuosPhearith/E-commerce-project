import { Module } from '@nestjs/common';
import { HeaderService } from './header.service';
import { HeaderController } from './header.controller';

@Module({
  controllers: [HeaderController],
  providers: [HeaderService],
})
export class HeaderModule {}
