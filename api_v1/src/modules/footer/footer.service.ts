import { Injectable } from '@nestjs/common';
import { CreateFooterDto } from './dto/create-footer.dto';
import { UpdateFooterDto } from './dto/update-footer.dto';

@Injectable()
export class FooterService {
  create(createFooterDto: CreateFooterDto) {
    return 'This action adds a new footer';
  }

  findAll() {
    return `This action returns all footer`;
  }

  findOne(id: number) {
    return `This action returns a #${id} footer`;
  }

  update(id: number, updateFooterDto: UpdateFooterDto) {
    return `This action updates a #${id} footer`;
  }

  remove(id: number) {
    return `This action removes a #${id} footer`;
  }
}
